package controller;

import model.distribuidora.*;
import model.empresa.Regiao;
import model.empresa.Vendedor;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.List;

public class LojaController {
	public static void main(String[] args) {







		Item item1 = new Item(5,BigDecimal.valueOf(50),Situacao.ativo);

		Item item2 = new Item(10, BigDecimal.valueOf(10),Situacao.cancelado);

		Produto p1 = new Produto("HGTKSJGBFJ","Banana","Da Terra",76,BigDecimal.valueOf(10),
				BigDecimal.valueOf(15), List.of(f2),List.of(item1));

		Produto p2 = new Produto("JBKAKDJAB","Salgadinho","Cheetos",86,
				BigDecimal.valueOf(5),BigDecimal.valueOf(8),List.of(f1),List.of(item2));

		Pedido ped = new Pedido("ba275", LocalDate.now(),BigDecimal.valueOf(455),List.of(item1), Estado.emTransporte);

		Vendedor v1 = new Vendedor(1L,"Bananão Da Silva","banana@gmail.com",
				"539995427763", BigDecimal.valueOf(5000),20,List.of(ped), Regiao.Leste);

		Fornecedor f1 = new Fornecedor("5308-869847-0000","MamaosDoAguiar","IsraelClaudio",
				"claudiomiro@gmail.com","5399941325",List.of(p2));

		Fornecedor f2 = new Fornecedor("28361736120-2222","BastosGordao",
				"BastosBastoes","bastos@gmail.com","5399946723",List.of(p1));











	}
}
