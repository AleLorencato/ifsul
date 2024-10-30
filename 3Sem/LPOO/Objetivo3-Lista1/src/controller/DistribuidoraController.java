package controller;

import java.time.*;
import java.time.format.DateTimeFormatter;

public class DistribuidoraController {
		public static void main(String[] args) {
			//a)
			Long timestamp = 1723066578101L;

			Instant hora = Instant.ofEpochMilli(timestamp);

			LocalDateTime dateTime = LocalDateTime.ofInstant(hora, ZoneOffset.UTC);

			String formattedDateTime = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")
					.format(dateTime);

			System.out.println(formattedDateTime);


			//b)
			LocalDateTime dateTime1 = LocalDateTime.ofInstant(hora,
					ZoneId.of("UTC-3"));

			String formattedDateTime1 = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")
					.format(dateTime1);

			System.out.println(formattedDateTime1);

			LocalDateTime dateTime2 = LocalDateTime.ofInstant(hora,
					ZoneId.of("UTC+1"));

			String formattedDateTime2 = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")
					.format(dateTime2);

			System.out.println(formattedDateTime2);

			//c)
			LocalDateTime dateTime3 = LocalDateTime.ofInstant(hora,
					ZoneId.of("America/Sao_Paulo"));

			String formattedDateTime3 = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")
					.format(dateTime3);

			System.out.println(formattedDateTime3);

			LocalDateTime dateTime4 = LocalDateTime.ofInstant(hora,
					ZoneId.of("Europe/Paris"));

			String formattedDateTime4 = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")
					.format(dateTime4);

			System.out.println(formattedDateTime4);

			//Existe diferença entre o UTC e o Horário local,
			// pois no horário local o horário pode ser diferente por
			// razões de horário de verão por exemplo.
			// Já o UTC é somente o deslocamente em relação ao UTC 0

			//d)

			LocalDate date = LocalDate.parse("2024-08-07");
			System.out.println(DateTimeFormatter.ofPattern("dd/MM/yyyy").format(date));


			//e)

			LocalTime time = LocalTime.parse("14:05");
			System.out.println(DateTimeFormatter.ofPattern("HH:mm").format(time));

			//f)
			LocalDate hoje = LocalDate.now();
			LocalDate date1 = LocalDate.parse("1822-09-07");
			System.out.println(DateTimeFormatter.ofPattern("dd/MM/yyyy").format(date1));
			Period periodo = Period.between(date1, hoje);
			System.out.printf("Tempo: %s anos, %s meses, %s dias",
					periodo.getYears(),periodo.getMonths(),
					periodo.getDays());

			//g)

			//h

			LocalDateTime dateTime5 = LocalDateTime.parse("2014/12/06 17:00");

			String formattedDateTime5 = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm")
					.format(dateTime5);

			System.out.println(formattedDateTime5);

		}
	}

