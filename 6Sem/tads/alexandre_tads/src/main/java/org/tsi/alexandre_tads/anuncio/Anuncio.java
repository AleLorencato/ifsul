package org.tsi.alexandre_tads.anuncio;
import com.fasterxml.jackson.annotation.JsonIgnore;
import lombok.*;
import jakarta.persistence.*;
import org.tsi.alexandre_tads.carro.Carro;
import org.tsi.alexandre_tads.usuario.Usuario;

import java.util.Date;
import java.util.UUID;

@Entity(name = "Anuncio")
@Table(name = "anuncios")
@Data
@AllArgsConstructor
@NoArgsConstructor
public class Anuncio {

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private UUID id;

	private String titulo;

	private String descricao;

	private float preco;

	private String status;

	private Date createdAt;

	private Date updatedAt;

	@OneToOne(cascade = CascadeType.ALL, optional = false, orphanRemoval = true)
	@JoinColumn(name = "carro_id", unique = true, nullable = false)
	private Carro carro;


	@ManyToOne(fetch = FetchType.LAZY, optional = false)
	@JoinColumn(name = "usuario_id", nullable = false)
	private Usuario usuario;


}
