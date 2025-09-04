package org.tsi.alexandre_tads.model;
import lombok.*;
import jakarta.persistence.*;
import java.util.Date;
import java.util.UUID;

@Entity(name = "Carro")
@Table(name = "carros")
@AllArgsConstructor
@NoArgsConstructor
@Data
public class Carro {
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private UUID id;

	private String marca;

	private String modelo;

	private String cor;

	private int ano;

	private int quilometragem;

	private String combustivel;

	private Date createdAt;

	private Date updatedAt;

	@OneToOne(mappedBy = "carro")
	private Anuncio anuncio;


}
