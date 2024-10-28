from pyspark.sql import SparkSession
from pyspark.sql.functions import when, col, split

spark = SparkSession.builder.appName("parquet_csv").getOrCreate()

### mudar o tituloPincipal para tituloPrincipal
movies_cast = {
    "id": "string",
    "tituloPincipal": "string",
    "tituloOriginal": "string",
    "anoLancamento": "int",
    "tempoMinutos": "int",
    "genero": "string",
    "notaMedia": "float",
    "numeroVotos": "int",
    "generoArtista": "string",
    "profissao": "array<string>",
    "titulosMaisConhecidos": "array<string>"
}

series_cast = {
    "id": "string",
    "tituloPrincipal": "string",
    "tituloOriginal": "string",
    "anoLancamento": "int",
    "tempoMinutos": "int",
    "genero": "string",
    "notaMedia": "float",
    "numeroVotos": "int",
    "generoArtista": "string",
    "profissao": "array<string>",
    "titulosMaisConhecidos": "array<string>"
}

def process_csv_to_parquet(input_path, tipo_arquivo):
    print(f"Processando {tipo_arquivo}...")

    df = spark.read.option("delimiter", "|").option("header", "true").csv(input_path)

    df = df.withColumn("is_comedy", when(df.genero == "Comedy", 1).otherwise(0))

    df_comedy = df.filter(df.is_comedy == 1)

    df_comedy = df_comedy.drop("is_comedy")

    if tipo_arquivo == "filmes":
        df = df.drop("nomeArtista","anoNascimento", "anoFalecimento", "personagem")
        for column, data_type in movies_cast.items():
            if column in df.columns:
                if data_type == "string":
                    df = df.withColumn(column, when(col(column) == '\n', 'null').otherwise(col(column)))
                elif data_type == "int" or data_type == "float":
                    df = df.withColumn(column, when(col(column) == '\n', 0).otherwise(col(column)))
                elif data_type == "array<string>":
                    df = df.withColumn(column, when(col(column).contains('\n'), 'null').otherwise(col(column)))

        for column, data_type in movies_cast.items():
            if column in df.columns:
                if data_type == "array<string>":
                    df = df.withColumn(column, split(col(column), ','))
            else:
                df = df.withColumn(column, col(column).cast(data_type))
    else:
        df = df.drop("anoTermino","nomeArtista","anoNascimento", "anoFalecimento", "personagem")
        for column, data_type in series_cast.items():
            if column in df.columns:
                if data_type == "string":
                    df = df.withColumn(column, when(col(column) == '\n', 'null').otherwise(col(column)))
                elif data_type == "int" or data_type == "float":
                    df = df.withColumn(column, when(col(column) == '\n', 0).otherwise(col(column)))
                elif data_type == "array<string>":
                    df = df.withColumn(column, when(col(column).contains('\n'), 'null').otherwise(col(column)))

        for column, data_type in series_cast.items():
            if column in df.columns:
                if data_type == "array<string>":
                    df = df.withColumn(column, split(col(column), ','))
                else:
                    df = df.withColumn(column, col(column).cast(data_type))


    df_comedy.repartition(2).write.mode('overwrite').parquet()
    df.show(20)
    df.printSchema()



process_csv_to_parquet("./test-movies.csv", "filmes")

process_csv_to_parquet("./test-movies.csv", "series")



spark.stop()
