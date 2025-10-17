package org.tsi.alexandre_tads.infra.security;


import jakarta.servlet.FilterChain;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Component;
import org.springframework.web.filter.OncePerRequestFilter;
import org.tsi.alexandre_tads.autenticacao.AutenticacaoRepository;

import java.io.IOException;

@Component
public class SecurityFilter extends OncePerRequestFilter {

	private TokenService tokenService;
	private AutenticacaoRepository repository;

	public SecurityFilter(TokenService tokenService, AutenticacaoRepository repository) {
		this.tokenService = tokenService;
		this.repository = repository;
	}

	@Override
	protected void doFilterInternal(HttpServletRequest request, HttpServletResponse response, FilterChain filterChain) throws ServletException, IOException {
		var tokenJWT = recuperarToken(request);
		if (tokenJWT != null) {
			var subject = tokenService.getSubject(tokenJWT);
			var usuario = repository.findByEmail(subject);
			var authentication = new UsernamePasswordAuthenticationToken(usuario, null, usuario.getAuthorities());
			SecurityContextHolder.getContext().setAuthentication(authentication);
		}

		filterChain.doFilter(request, response);
	}

	private String recuperarToken(HttpServletRequest request) {
		var autorizationHeader = request.getHeader("Authorization");
		if (autorizationHeader != null) {
			return autorizationHeader.replace("Bearer ", "");
		}
		return null;
	}
}