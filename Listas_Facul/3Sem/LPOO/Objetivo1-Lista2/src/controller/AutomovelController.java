package controller;
import model.Automovel;

import java.util.*;

public class AutomovelController {
    public static void main(String[] args) {
        Automovel a1 = new Automovel();
        Automovel a2 = new Automovel();

        Automovel a3 = new Automovel(3,"7468934552","DEP-2205","azul",4,"Gasolina",110000,"ASKJDGASLCN",550);
        Automovel a4 = new Automovel(4,"0878653431","IUG-8694","Preto",6,"Diesel",280000,"OITLGHMVBC",3500);

        Automovel a5 = new Automovel("GQK-9873",30000,250);
        Automovel a6 = new Automovel("AIJ-9945",50000,325);

        System.out.println(a1);
        System.out.println(a2);
        System.out.println(a3);
        System.out.println(a4);
        System.out.println(a5);
        System.out.println(a6);

        a1.setId(1);
        a1.setRenavan("186456076");
        a1.setPlaca("TYV-8532");
        a1.setCor("Branco");
        a1.setNum_rodas(4);
        a1.setCombustivel("flex");
        a1.setQuilometragem(100000);
        a1.setChassi("KLBUFKJVCS");
        a1.setValor_locacao(320);
        a2.setId(2);
        a2.setRenavan("9578023679");
        a2.setPlaca("PUI-6789");
        a2.setCor("Vermelho");
        a2.setNum_rodas(4);
        a2.setCombustivel("Etanol");
        a2.setQuilometragem(55000);
        a2.setChassi("UJTGHIKFRN");
        a2.setValor_locacao(500);

        System.out.println(a1.getId());
        System.out.println(a1.getRenavan());
        System.out.println(a1.getPlaca());
        System.out.println(a1.getCor());
        System.out.println(a1.getNum_rodas());
        System.out.println(a1.getCombustivel());
        System.out.println(a1.getQuilometragem());
        System.out.println(a1.getChassi());
        System.out.println(a2.getId());
        System.out.println(a2.getValor_locacao());
        System.out.println(a2.getRenavan());
        System.out.println(a2.getPlaca());
        System.out.println(a2.getCor());
        System.out.println(a2.getNum_rodas());
        System.out.println(a2.getCombustivel());
        System.out.println(a2.getQuilometragem());
        System.out.println(a2.getChassi());
        System.out.println(a2.getValor_locacao());

        List<Automovel> automovelList = new ArrayList<>();
        automovelList.add(a1);
        automovelList.add(a2);
        automovelList.add(a3);
        System.out.println("\nColeção do tipo List\n" + automovelList);

        automovelList.sort(Comparator.comparing(Automovel::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(automovelList);

        Map<Integer, Automovel> automovelMap = new HashMap<>();
        automovelMap.put(a1.getId(), a1);
        automovelMap.put(a2.getId(), a2);
        automovelMap.put(a3.getId(), a3);

        for (Automovel automovel : automovelList) {
            if (automovel.getId() == 3) {
                System.out.print("\nAutomóvel com id = 3 ");
                System.out.print(automovel);
            }
        }

        automovelList.sort(Comparator.comparing(Automovel::getId));
        Automovel automovelFind = automovelList.get(
                Collections.binarySearch(
                        automovelList,
                        a3,
                        Comparator.comparing(Automovel::getId)
                )
        );
        System.out.println("\nAutomóvel binary search");
        System.out.println(automovelFind);
        System.out.println("\nPesquisa com Stream e filter\n");
        System.out.println(
                automovelList.stream().filter(a -> a.getCor().equals("Branco"))
                        .findAny()
                        .orElse(null)
        );



    }
}