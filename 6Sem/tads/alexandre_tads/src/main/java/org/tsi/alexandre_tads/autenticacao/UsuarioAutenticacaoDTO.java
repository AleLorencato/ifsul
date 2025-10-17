package org.tsi.alexandre_tads.autenticacao;
import jakarta.validation.constraints.*;

public record UsuarioAutenticacaoDTO(
		@Email(message = "O email deve ter @ e  . , no mínimo.")
		@NotBlank(message = "A senha não pode ser nula ou vazia")
		String email,
		@NotBlank(message = "A senha não pode ser nula ou vazia")
		@Size(min = 6, max = 12, message = "A senha deve ter entre 6 e 12 caracteres")
		String senha
	){
}