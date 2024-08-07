package controller;
import model.distribuidora.Fornecedor;
import model.distribuidora.Fornecimento;
import model.distribuidora.Produto;
import java.math.BigDecimal;
import java.text.NumberFormat;
import java.time.LocalDateTime;
import java.util.Arrays;
import java.util.List;
public class DistribuidoraController {
		public static void main(String[] args) {
			Fornecedor f1 = new Fornecedor("89.555.478/9999-10",
					"Luva Cia & Amigos", "luvadepedreiro",
					"luvadepedreiro@gmail.com", "53999654122", null);

			Produto p1 = new Produto("PSIT56", "Mamão", "Papaya", 15,
					BigDecimal.valueOf(13.0), BigDecimal.valueOf(18.9), List.of(f1));
			Produto p2 = new Produto("PSIT56", "Chuchu", "Verde", 50, BigDecimal.valueOf(5.0), BigDecimal.valueOf(8.9), List.of(f1));

			Fornecimento fr1 = new Fornecimento(LocalDateTime.of
					(2024, 8, 6, 10, 43),
					15, p1.getPrecoDeCompra().multiply(BigDecimal.valueOf(100)),
					f1, p1);
			Fornecimento fr2 = new Fornecimento(LocalDateTime.of
					(2024, 8, 4, 23, 52),
					15, p2.getPrecoDeCompra().multiply(BigDecimal.valueOf(100))
					, f1, p2);

			List<Fornecimento> fornecimentos = Arrays.asList(fr1, fr2);
			BigDecimal total = BigDecimal.ZERO;
			for (Fornecimento fornecimento : fornecimentos) {
				total = total.add(fornecimento.getTotal());
			}
			System.out.println("\nRelatório de fornecimentos");
			System.out.println(fornecimentos);
			System.out.println("Total de fornecimentos= "
					+ NumberFormat.getCurrencyInstance().format(total));
		}
	}

