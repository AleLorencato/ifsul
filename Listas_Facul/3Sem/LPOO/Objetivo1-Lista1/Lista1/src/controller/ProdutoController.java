package controller;

import model.Produto;

import java.util.*;

public class ProdutoController {
    public static void main(String[] args)
    {
        Produto p1 = new Produto();
        Produto p2 = new Produto();

        Produto p3 = new Produto(1,"Arroz","Arroz Branco", 5,100);
        Produto p4 = new Produto(2,"Alface","Crespa", 1.5,30);

        Produto p5 = new Produto("Sabonete","Protex");
        Produto p6 = new Produto("Shampoo","Head And Shoulders");

        System.out.println(p1);
        System.out.println(p2);
        System.out.println(p3);
        System.out.println(p4);
        System.out.println(p5);
        System.out.println(p6);

        p1.setId(3);
        p1.setDescricao("Barra de Chocolate ao leite");
        p1.setEstoque(1000);
        p1.setNome("Chocolate");
        p1.setValor(5.6);

        p2.setId(4);
        p2.setDescricao("Picanha Do Churras");
        p2.setEstoque(500);
        p2.setNome("Picanha");
        p2.setValor(50);

        p3.setId(5);
        p3.setDescricao("Cheetos");
        p3.setEstoque(380);
        p3.setNome("Salgadinho");
        p3.setValor(5);

        System.out.println(p1.getId());
        System.out.println(p1.getNome());
        System.out.println(p1.getDescricao());
        System.out.println(p1.getEstoque());
        System.out.println(p1.getValor());

        System.out.println(p2.getId());
        System.out.println(p2.getNome());
        System.out.println(p2.getDescricao());
        System.out.println(p2.getEstoque());
        System.out.println(p2.getValor());

        System.out.println(p3.getId());
        System.out.println(p3.getNome());
        System.out.println(p3.getDescricao());
        System.out.println(p3.getEstoque());
        System.out.println(p3.getValor());

        List<Produto> produtoList = new ArrayList<>();
        produtoList.add(p1);
        produtoList.add(p2);
        produtoList.add(p3);
        System.out.println("\nColeção do tipo List\n" + produtoList);

        produtoList.sort(Comparator.comparing(Produto::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(produtoList);

        Map<Integer, Produto> produtoMap = new HashMap<>();
        produtoMap.put(p1.getId(), p1);
        produtoMap.put(p2.getId(), p2);
        produtoMap.put(p3.getId(), p3);

        for (Produto produto : produtoList) {
            if (produto.getId() == 3) {
                System.out.print("\nProduto com id = 3 ");
                System.out.print(produto);
            }
        }

        produtoList.sort(Comparator.comparing(Produto::getId));
        Produto produtoFind = produtoList.get(
                Collections.binarySearch(
                        produtoList,
                        p3,
                        Comparator.comparing(Produto::getId)
                )
        );

        System.out.println("\nProduto binary search");
        System.out.println(produtoFind);
    }
}

    }
}
