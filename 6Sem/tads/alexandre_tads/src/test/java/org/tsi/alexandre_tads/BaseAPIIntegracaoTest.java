package org.tsi.alexandre_tads;

import org.junit.jupiter.api.BeforeEach;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.web.client.TestRestTemplate;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.ResponseEntity;
import org.tsi.alexandre_tads.autenticacao.AutenticacaoService;
import org.tsi.alexandre_tads.infra.security.TokenService;
import org.tsi.alexandre_tads.usuario.Usuario;

import static org.junit.jupiter.api.Assertions.assertNotNull;
import static org.springframework.http.HttpMethod.*;

/*
    Esta é a superclasse para os testes dos controllers. Ela é baseada na classe TestRestTemplate (do Spring),
    que oferece ferramentas para chamadas HTTP em APIs reais. É por isso que a classe está marcada com
    @SpringBootTest e suas personalizações.
    Ela pode ser reutilizada para realizar teste de integração de qualquer um dos controllers do projeto.
 */

@SpringBootTest(classes = AlexandreTadsApplication.class, webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
public abstract class BaseAPIIntegracaoTest {
  @Autowired
  protected TestRestTemplate rest;

  @Autowired
  private AutenticacaoService service;

  @Autowired
  private TokenService tokenService;

  private String jwtToken = "";

  @BeforeEach
  public void setupTest() {
    Usuario user = (Usuario) service.loadUserByUsername("joao@email.com");
    assertNotNull(user);

    jwtToken = tokenService.geraToken(user);
    assertNotNull(jwtToken);
  }

  protected HttpHeaders getHeaders() {
    HttpHeaders headers = new HttpHeaders();
    headers.add(HttpHeaders.AUTHORIZATION, "Bearer " + jwtToken);
    headers.add(HttpHeaders.CONTENT_TYPE, "application/json");
    return headers;
  }

  protected <T> ResponseEntity<T> post(String url, Object body, Class<T> responseType) {
    HttpHeaders headers = getHeaders();
    return rest.exchange(url, POST, new HttpEntity<>(body, headers), responseType);
  }

  protected <T> ResponseEntity<T> put(String url, Object body, Class<T> responseType) {
    HttpHeaders headers = getHeaders();
    return rest.exchange(url, PUT, new HttpEntity<>(body, headers), responseType);
  }

  protected <T> ResponseEntity<T> get(String url, Class<T> responseType) {
    HttpHeaders headers = getHeaders();
    return rest.exchange(url, GET, new HttpEntity<>(headers), responseType);
  }

  protected <T> ResponseEntity<T> delete(String url, Class<T> responseType) {
    HttpHeaders headers = getHeaders();
    return rest.exchange(url, DELETE, new HttpEntity<>(headers), responseType);
  }
}
