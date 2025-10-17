package org.tsi.alexandre_tads.autenticacao;

import jakarta.validation.Valid;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.tsi.alexandre_tads.infra.security.TokenJwtDTO;
import org.tsi.alexandre_tads.infra.security.TokenService;
import org.tsi.alexandre_tads.usuario.Usuario;

import java.util.List;

@RestController

@RequestMapping("api/v1/login")
public class AutenticacaoController {

	private AuthenticationManager manager;
	private TokenService tokenService;

	public AutenticacaoController(AuthenticationManager manager, TokenService tokenService, List<UsuarioAutenticacaoDTO> validacoes) {
		this.manager = manager;
		this.tokenService = tokenService;
	}

	@PostMapping
	public ResponseEntity<TokenJwtDTO> efetuaLogin(@Valid @RequestBody UsuarioAutenticacaoDTO data) {
		var authenticationDTO = new UsernamePasswordAuthenticationToken(data.email(), data.senha());


		var authentication = manager.authenticate(authenticationDTO);
		var tokenJWT = tokenService.geraToken((Usuario) authentication.getPrincipal());
		return ResponseEntity.ok(new TokenJwtDTO(tokenJWT));
	}
}
