package org.tsi.alexandre_tads.infra.security;

import com.auth0.jwt.JWT;
import com.auth0.jwt.algorithms.Algorithm;
import com.auth0.jwt.exceptions.JWTCreationException;
import com.auth0.jwt.exceptions.JWTVerificationException;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import org.tsi.alexandre_tads.usuario.Usuario;

import java.time.Duration;
import java.time.Instant;

@Service
public class TokenService {

	@Value(value = "${api.security.token.secret}")
	private String secret;

	public String geraToken(Usuario usuario){
		try {
			var algorithm = Algorithm.HMAC256(secret);
			return JWT.create()
					.withIssuer("API Produtos Exemplo de TADS")
					.withSubject(usuario.getUsername())
					.withIssuedAt(Instant.now())
					.withExpiresAt(Instant.now().plus(Duration.ofHours(2)))
					.sign(algorithm);
		} catch (JWTCreationException exception){
			throw new RuntimeException("Erro ao gerar o token JWT.", exception);
		}
	}

	public String getSubject(String tokenJWT){
		try {
			var algorithm = Algorithm.HMAC256(secret);
			return JWT.require(algorithm)
					.withIssuer("API Produtos Exemplo de TADS")
					.build()
					.verify(tokenJWT)
					.getSubject();
		} catch (JWTVerificationException exception){
			throw new TokenInvalidoException("Token JWT inválido ou expirado.");
		}
	}
}
