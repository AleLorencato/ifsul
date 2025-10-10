package org.tsi.alexandre_tads.anuncio;

import lombok.Data;
import org.tsi.alexandre_tads.anuncio.Anuncio;
import java.util.Date;
import java.util.UUID;

@Data
public class AnuncioResponseDTO {
    private UUID id;
    private String titulo;
    private String descricao;
    private float preco;
    private String status;
    private Date createdAt;
    private Date updatedAt;

    private UUID carroId;
    private String marca;
    private String modelo;
    private String cor;
    private int ano;
    private int quilometragem;
    private String combustivel;

    private UUID usuarioId;

    public static AnuncioResponseDTO fromEntity(Anuncio anuncio) {
        AnuncioResponseDTO dto = new AnuncioResponseDTO();
        dto.setId(anuncio.getId());
        dto.setTitulo(anuncio.getTitulo());
        dto.setDescricao(anuncio.getDescricao());
        dto.setPreco(anuncio.getPreco());
        dto.setStatus(anuncio.getStatus());
        dto.setCreatedAt(anuncio.getCreatedAt());
        dto.setUpdatedAt(anuncio.getUpdatedAt());

        if (anuncio.getCarro() != null) {
            dto.setCarroId(anuncio.getCarro().getId());
            dto.setMarca(anuncio.getCarro().getMarca());
            dto.setModelo(anuncio.getCarro().getModelo());
            dto.setCor(anuncio.getCarro().getCor());
            dto.setAno(anuncio.getCarro().getAno());
            dto.setQuilometragem(anuncio.getCarro().getQuilometragem());
            dto.setCombustivel(anuncio.getCarro().getCombustivel());
        }

        if (anuncio.getUsuario() != null) {
            dto.setUsuarioId(anuncio.getUsuario().getId());
        }

        return dto;
    }
}

