package controller;

import java.time.Duration;
import java.time.Instant;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;

public class Questao2Controller {
	public static void main(String[] args) {
		// a)

		Instant instant = Instant.ofEpochMilli(1723470921421L);

		LocalDateTime brasilia = LocalDateTime.ofInstant(instant, ZoneId.of("UTC-3"));

		LocalDateTime acre = LocalDateTime.ofInstant(instant, ZoneId.of("UTC-4"));

		System.out.println("Data em GTM-3: " + DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm").format(brasilia));

		System.out.println("Data em GTM-4: " + DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm").format(acre));

		// b)
		Instant instantCriacao = Instant.now();

		Instant instantExpiracao = instantCriacao.plus(Duration.ofHours(2));

		LocalDateTime dataCriacao = LocalDateTime.ofInstant(instantCriacao, ZoneId.of("UTC-0"));

		LocalDateTime dataExpiracao = LocalDateTime.ofInstant(instantExpiracao, ZoneId.of("UTC-0"));

		System.out
				.println("Data de Criação do Token: " + DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm").format(dataCriacao));

		System.out.println(
				"Data de Expiração do Token: " + DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm").format(dataExpiracao));

	}

}
