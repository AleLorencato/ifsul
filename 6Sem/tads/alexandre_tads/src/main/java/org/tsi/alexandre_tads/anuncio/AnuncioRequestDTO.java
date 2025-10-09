package org.tsi.alexandre_tads.anuncio;

import lombok.Data;
import java.util.UUID;

@Data
public class AnuncioRequestDTO {
    private String titulo;
    private String descricao;
    private float preco;
    private String status;

    private String marca;
    private String modelo;
    private String cor;
    private int ano;
    private int quilometragem;
    private String combustivel;

    private UUID usuarioId;
}

