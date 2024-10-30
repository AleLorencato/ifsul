package controller;

import exceptions.FaltaEnderecoDeEntregaException;
import model.*;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class Questao1Controller {

	public static void main(String[] args) throws FaltaEnderecoDeEntregaException {

		Fornecedor forn1 = new Fornecedor("59811039031", "comidas-ltda", "comidaolegal",
				"comidalegal@gmail.com", "5598539825", null);

		EnderecoDeCobranca ec1 = new EnderecoDeCobranca("Casa", "rua dois", "200",
				"fragata", "96090-999", Cidade.Pelotas, Uf.RS);

		EnderecoDeCobranca ec2 = new EnderecoDeCobranca("Apartamento", "rua abraham", "100",
				"canoas", "96888-555", Cidade.PortoAlegre, Uf.RS);

		EnderecoDeEntrega ee1 = new EnderecoDeEntrega("Casa", "rua tres", "100",
				"fragata", "96030-657", Cidade.Pelotas, Uf.RS);

		// EnderecoDeEntrega ee2 = new EnderecoDeEntrega("Apartamento","rua
		// cinco","500",
		// "porto feliz","95458-000",Cidade.PortoAlegre,Uf.RS);

		Produto pr1 = new Produto("557", "banana", "banana-da-terra",
				50, BigDecimal.valueOf(1), BigDecimal.valueOf(2), List.of(forn1));

		Produto pr2 = new Produto("832", "Mamao", "papaya",
				100, BigDecimal.valueOf(4), BigDecimal.valueOf(7), List.of(forn1));

		Item i1 = new Item(100, BigDecimal.valueOf(500), Situacao.Ativo, pr1);
		Item i2 = new Item(50, BigDecimal.valueOf(2500), Situacao.Cancelado, pr2);

		List<Item> itens = new ArrayList<Item>();
		itens.add(i1);
		itens.add(i2);

		Pedido p1 = new Pedido("1", LocalDate.of(2024, 5, 18),
				BigDecimal.valueOf(10), List.of(i1), Estado.Faturado);

		ClientePessoaFisica c1 = new ClientePessoaFisica("Alexandre Araujo lorencato",
				"alexandre@gmail.com", "21984499967", List.of(p1), ec1, ee1, "35573567215");


		// c)

		// iii
		System.out.println("\nEstoque de Produto antes do pedido 1:"+ pr1.getQuantidade());
		System.out.println("\nEstoque de Produto antes do pedido 2:"+ pr2.getQuantidade());



		int total;
		total = pr1.getQuantidade() - p1.getTotal().intValue();
		pr1.setQuantidade(total);

		System.out.println("\nEstoque de Produto depois do pedido 1:"+ pr1.getQuantidade());
		System.out.println("\nEstoque de Produto depois do pedido 2:"+ pr2.getQuantidade());




		// iv
		System.out.println("Detalhes do Pedido:");
		System.out.println(c1);


		// d)
		ClientePessoaFisica c2 = new ClientePessoaFisica("Joao dias",
				"joao@gmail.com", "53 9995456328", List.of(p1), ec2, null, "4378136898123");

		if (c2.getEnderecosEntregas() == null) {
			throw new FaltaEnderecoDeEntregaException(
					"falta cadastrar o endereco de entrega do cliente " + c2.getNomeCompleto());
		}

	}

}
