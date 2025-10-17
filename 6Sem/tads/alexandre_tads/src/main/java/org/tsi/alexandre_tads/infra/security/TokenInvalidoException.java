package org.tsi.alexandre_tads.infra.security;

import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ResponseStatus;

@ResponseStatus(HttpStatus.UNAUTHORIZED)
public class TokenInvalidoException extends RuntimeException {

	public TokenInvalidoException(String message) {
		super(message);
	}
}
