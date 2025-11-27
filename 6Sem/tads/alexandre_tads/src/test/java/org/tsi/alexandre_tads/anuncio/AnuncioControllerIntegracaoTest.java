package org.tsi.alexandre_tads.anuncio;

import org.junit.jupiter.api.Test;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.core.ParameterizedTypeReference;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpMethod;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.test.context.ActiveProfiles;
import org.tsi.alexandre_tads.AlexandreTadsApplication;
import org.tsi.alexandre_tads.BaseAPIIntegracaoTest;

import java.util.List;
import java.util.UUID;

import static org.junit.jupiter.api.Assertions.*;

@SpringBootTest(classes = AlexandreTadsApplication.class, webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
@ActiveProfiles("test")
class AnuncioControllerIntegracaoTest extends BaseAPIIntegracaoTest {

  private ResponseEntity<AnuncioResponseDTO> getAnuncio(String url) {
    return get(url, AnuncioResponseDTO.class);
  }

  private ResponseEntity<List<AnuncioResponseDTO>> getAnunciosList(String url) {
    var headers = getHeaders();

    return rest.exchange(
        url,
        HttpMethod.GET,
        new HttpEntity<>(headers),
        new ParameterizedTypeReference<>() {
        });
  }

  @Test
  void listarAnuncios() {
    var data = getAnunciosList("/api/v1/anuncios").getBody();

    assertNotNull(data);
	assertTrue(data.size() >= 5);
  }

  @Test
  void buscarAnuncioPorId() {
    
    String idExistente = "aa111111-aaaa-aaaa-aaaa-aaaaaaaaaaaa";

    var response = getAnuncio("/api/v1/anuncios/" + idExistente);

    assertNotNull(response);
    assertEquals(HttpStatus.OK, response.getStatusCode());
    assertNotNull(response.getBody());
    assertEquals("Honda Civic 2020", response.getBody().getTitulo());
    assertEquals("Honda", response.getBody().getMarca());
  }

  @Test
  void buscarAnuncioPorIdInexistente() {
    
    String idInexistente = "99999999-9999-9999-9999-999999999999";

    var response = getAnuncio("/api/v1/anuncios/" + idInexistente);

    assertEquals(HttpStatus.NOT_FOUND, response.getStatusCode());
  }

  @Test
  void criarAnuncio() {
    
    AnuncioRequestDTO requestDTO = new AnuncioRequestDTO();
    requestDTO.setTitulo("Fiat Uno 2022");
    requestDTO.setDescricao("Carro novo, zero km");
    requestDTO.setPreco(55000.0f);
    requestDTO.setStatus("ATIVO");
    requestDTO.setMarca("Fiat");
    requestDTO.setModelo("Uno");
    requestDTO.setCor("Branco");
    requestDTO.setAno(2022);
    requestDTO.setQuilometragem(0);
    requestDTO.setCombustivel("Flex");
    requestDTO.setUsuarioId(UUID.fromString("b6c0719c-416c-4350-a476-d98ab644fb58"));

    var response = post("/api/v1/anuncios", requestDTO, AnuncioResponseDTO.class);

    assertNotNull(response);
    assertEquals(HttpStatus.CREATED, response.getStatusCode());
    assertNotNull(response.getBody());
    assertEquals("Fiat Uno 2022", response.getBody().getTitulo());
    assertEquals("Fiat", response.getBody().getMarca());
    assertEquals(55000.0f, response.getBody().getPreco());
  }

  @Test
  void criarAnuncioComUsuarioInexistente() {
    
    AnuncioRequestDTO requestDTO = new AnuncioRequestDTO();
    requestDTO.setTitulo("Teste");
    requestDTO.setDescricao("Teste");
    requestDTO.setPreco(10000.0f);
    requestDTO.setStatus("ATIVO");
    requestDTO.setMarca("Teste");
    requestDTO.setModelo("Teste");
    requestDTO.setCor("Preto");
    requestDTO.setAno(2020);
    requestDTO.setQuilometragem(1000);
    requestDTO.setCombustivel("Gasolina");
    requestDTO.setUsuarioId(UUID.fromString("99999999-9999-9999-9999-999999999999"));

    var response = post("/api/v1/anuncios", requestDTO, AnuncioResponseDTO.class);

    assertEquals(HttpStatus.BAD_REQUEST, response.getStatusCode());
  }

  @Test
  void atualizarAnuncio() {
    
    String idExistente = "bb222222-bbbb-bbbb-bbbb-bbbbbbbbbbbb";
    AnuncioRequestDTO requestDTO = new AnuncioRequestDTO();
    requestDTO.setTitulo("Toyota Corolla 2019 - ATUALIZADO");
    requestDTO.setDescricao("Descrição atualizada");
    requestDTO.setPreco(80000.0f);
    requestDTO.setStatus("ATIVO");
    requestDTO.setMarca("Toyota");
    requestDTO.setModelo("Corolla");
    requestDTO.setCor("Azul");
    requestDTO.setAno(2019);
    requestDTO.setQuilometragem(35000);
    requestDTO.setCombustivel("Gasolina");

    var response = put("/api/v1/anuncios/" + idExistente, requestDTO, AnuncioResponseDTO.class);

    assertNotNull(response);
    assertEquals(HttpStatus.OK, response.getStatusCode());
    assertNotNull(response.getBody());
    assertEquals("Toyota Corolla 2019 - ATUALIZADO", response.getBody().getTitulo());
    assertEquals("Azul", response.getBody().getCor());
    assertEquals(80000.0f, response.getBody().getPreco());
  }

  @Test
  void atualizarAnuncioInexistente() {
    
    String idInexistente = "99999999-9999-9999-9999-999999999999";
    AnuncioRequestDTO requestDTO = new AnuncioRequestDTO();
    requestDTO.setTitulo("Teste");
    requestDTO.setDescricao("Teste");
    requestDTO.setPreco(10000.0f);
    requestDTO.setStatus("ATIVO");
    requestDTO.setMarca("Teste");
    requestDTO.setModelo("Teste");
    requestDTO.setCor("Preto");
    requestDTO.setAno(2020);
    requestDTO.setQuilometragem(1000);
    requestDTO.setCombustivel("Gasolina");

    var response = put("/api/v1/anuncios/" + idInexistente, requestDTO, AnuncioResponseDTO.class);

    assertEquals(HttpStatus.NOT_FOUND, response.getStatusCode());
  }
}
