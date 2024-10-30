package controller;

import model.Locacao;
import java.time.LocalDateTime;


public class LocacaoController {
    public static void main(String[] args) {
        Locacao l1 = new Locacao();
        Locacao l2 = new Locacao();

        Locacao l3 = new Locacao(LocalDateTime.of(2022, 6, 28, 10, 0), LocalDateTime.of(2021, 2, 15, 10, 0), 200, 30.00, 30.00, false);
        Locacao l4 = new Locacao(LocalDateTime.of(2023, 2, 10, 10, 0), LocalDateTime.of(2023, 2, 15, 10, 0), 200, 40.00, 40.00, false);


        Locacao l5 = new Locacao(90, false);
        Locacao l6 = new Locacao(120, true);

        System.out.println(l1);
        System.out.println(l2);
        System.out.println(l3);
        System.out.println(l4);
        System.out.println(l5);
        System.out.println(l6);

        l1.setDataLocacao(LocalDateTime.of(2021, 1, 10, 10, 0));
        l1.setDataDevolucao(LocalDateTime.of(2021, 1, 11, 11, 0));
        l1.setQuilometragem(90000);
        l1.setValorCalcao(250);
        l1.setValor_locacao(250);
        l1.setDevolvido(true);

        l2.setDataLocacao(LocalDateTime.of(2023, 12, 30, 10, 0));
        l2.setDataDevolucao(LocalDateTime.of(2024, 1, 15, 17, 0));
        l2.setQuilometragem(20000);
        l2.setValorCalcao(500);
        l2.setValor_locacao(500);
        l2.setDevolvido(true);


        System.out.println(l1.getDataLocacao());
        System.out.println(l1.getDataDevolucao());
        System.out.println(l1.getQuilometragem());
        System.out.println(l1.getValorCalcao());
        System.out.println(l1.getValor_locacao());
        System.out.println(l1.isDevolvido());

        System.out.println(l2.getDataLocacao());
        System.out.println(l2.getDataDevolucao());
        System.out.println(l2.getQuilometragem());
        System.out.println(l2.getValorCalcao());
        System.out.println(l2.getValor_locacao());
        System.out.println(l2.isDevolvido());

    }


}
