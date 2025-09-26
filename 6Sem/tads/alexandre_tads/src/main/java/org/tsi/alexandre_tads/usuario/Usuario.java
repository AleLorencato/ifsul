package org.tsi.alexandre_tads.usuario;
import lombok.*;
import jakarta.persistence.*;
import org.tsi.alexandre_tads.anuncio.Anuncio;

import java.util.Date;
import java.util.List;
import java.util.UUID;

@Entity(name = "Usuario")
@Table(name = "usuarios")
@Data
@AllArgsConstructor
@NoArgsConstructor
public class Usuario {
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private UUID id;

	private String nome;

	private String email;

	private String senha;

	private String cpf;

	private String telefone;

	private String cidade;

	private String estado;

	private String cep;

	private Date createdAt;

	private Date updatedAt;

	@OneToMany(mappedBy = "usuario", fetch = FetchType.LAZY, cascade = CascadeType.ALL, orphanRemoval = true)

	private List<Anuncio> anuncios;



}
