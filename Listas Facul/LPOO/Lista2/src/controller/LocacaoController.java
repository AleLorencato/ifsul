package controller;

import model.Locacao;
import java.time.LocalDateTime;
import java.util.*;


public class LocacaoController {
    public static void main(String[] args) {
        Locacao l1 = new Locacao();
        Locacao l2 = new Locacao();

        Locacao l3 = new Locacao(3,LocalDateTime.of(2022, 6, 28, 10, 0), LocalDateTime.of(2021, 2, 15, 10, 0), 200, 30.00, 30.00, false);
        Locacao l4 = new Locacao(4,LocalDateTime.of(2023, 2, 10, 10, 0), LocalDateTime.of(2023, 2, 15, 10, 0), 200, 40.00, 40.00, false);


        Locacao l5 = new Locacao(90, false);
        Locacao l6 = new Locacao(120, true);

        System.out.println(l1);
        System.out.println(l2);
        System.out.println(l3);
        System.out.println(l4);
        System.out.println(l5);
        System.out.println(l6);
l1.setId(1);
        l1.setDataLocacao(LocalDateTime.of(2021, 1, 10, 10, 0));
        l1.setDataDevolucao(LocalDateTime.of(2021, 1, 11, 11, 0));
        l1.setQuilometragem(90000);
        l1.setValorCalcao(250);
        l1.setValor_locacao(250);
        l1.setDevolvido(true);
l2.setId(2);
        l2.setDataLocacao(LocalDateTime.of(2023, 12, 30, 10, 0));
        l2.setDataDevolucao(LocalDateTime.of(2024, 1, 15, 17, 0));
        l2.setQuilometragem(20000);
        l2.setValorCalcao(500);
        l2.setValor_locacao(500);
        l2.setDevolvido(true);

        System.out.println(l1.getId());
        System.out.println(l1.getDataLocacao());
        System.out.println(l1.getDataDevolucao());
        System.out.println(l1.getQuilometragem());
        System.out.println(l1.getValorCalcao());
        System.out.println(l1.getValor_locacao());
        System.out.println(l1.isDevolvido());

        System.out.println(l2.getId());
        System.out.println(l2.getDataLocacao());
        System.out.println(l2.getDataDevolucao());
        System.out.println(l2.getQuilometragem());
        System.out.println(l2.getValorCalcao());
        System.out.println(l2.getValor_locacao());
        System.out.println(l2.isDevolvido());

        List<Locacao> locacaoList = new ArrayList<>();
        locacaoList.add(l1);
        locacaoList.add(l2);
        locacaoList.add(l3);
        System.out.println("\nColeção do tipo List\n" + locacaoList);

        locacaoList.sort(Comparator.comparing(Locacao::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(locacaoList);

        Map<Integer, Locacao> locacaoMap = new HashMap<>();
        locacaoMap.put(l1.getId(), l1);
        locacaoMap.put(l2.getId(), l2);
        locacaoMap.put(l3.getId(), l3);

        for (Locacao locacao : locacaoList) {
            if (locacao.getId() == 3) {
                System.out.print("\nLocação com id = 3 ");
                System.out.print(locacao);
            }
        }

        locacaoList.sort(Comparator.comparing(Locacao::getId));
        Locacao locacaoFind = locacaoList.get(
                Collections.binarySearch(
                        locacaoList,
                        l3,
                        Comparator.comparing(Locacao::getId)
                )
        );

        System.out.println("\nLocação binary search");
        System.out.println(locacaoFind);
    }
}
