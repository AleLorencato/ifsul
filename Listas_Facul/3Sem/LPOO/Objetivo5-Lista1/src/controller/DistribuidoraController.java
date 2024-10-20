package controller;

import model.Fornecedor;
import model.Fornecimento;
import model.Produto;

import java.math.BigDecimal;
import java.text.NumberFormat;
import java.time.LocalDateTime;
import java.util.Arrays;
import java.util.List;

public class DistribuidoraController {
	public static void main(String[] args) {
		// Inicializando o fornecedor
		Fornecedor f1 = new Fornecedor("89.555.478/9999-10",
				"Luva Cia & Amigos", "luvadepedreiro",
				"luvadepedreiro@gmail.com", "53999654122", null);

		// Criando a lista de fornecedores
		List<Fornecedor> fornecedores = Arrays.asList(f1);

		// Inicializando os produtos com o fornecedor
		Produto p1 = new Produto("PSIT56", "Mamão", "Papaya", 15,
				BigDecimal.valueOf(13.0), BigDecimal.valueOf(18.9), fornecedores);
		Produto p2 = new Produto("PSIT57", "Chuchu", "Verde", 50, BigDecimal.valueOf(5.0), BigDecimal.valueOf(8.9),
				fornecedores);

		// Inicializando os fornecimentos
		Fornecimento fr1 = new Fornecimento(LocalDateTime.of(2024, 8, 6, 10, 43),
				15, p1.getPrecoDeCompra().multiply(BigDecimal.valueOf(15)), f1, p1);
		Fornecimento fr2 = new Fornecimento(LocalDateTime.of(2024, 8, 4, 23, 52),
				50, p2.getPrecoDeCompra().multiply(BigDecimal.valueOf(50)), f1, p2);

		// Criando a lista de fornecimentos
		List<Fornecimento> fornecimentos = Arrays.asList(fr1, fr2);

		// Calculando o total dos fornecimentos
		BigDecimal total = BigDecimal.ZERO;
		for (Fornecimento fornecimento : fornecimentos) {
			total = total.add(fornecimento.getTotal());
		}

		// Imprimindo o relatório de fornecimentos
		System.out.println("\nRelatório de fornecimentos");
		System.out.println(fornecimentos);
		System.out.println("Total de fornecimentos= "
				+ NumberFormat.getCurrencyInstance().format(total));
	}
}