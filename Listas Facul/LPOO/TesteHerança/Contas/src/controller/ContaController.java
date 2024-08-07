package controller;

import model.ContaConjunta;
import model.ContaCorrente;
import model.ContaPoupanca;
import model.ContaPoupancaSalario;

public class ContaController {
    public static void main(String[] args) {
        ContaPoupanca cp1 = new ContaPoupanca();

        ContaCorrente cc1 = new ContaCorrente();

        System.out.println(cp1);
        System.out.println(cc1);

        ContaConjunta ccj = new ContaConjunta(1999);
        System.out.println(ccj);

        ContaPoupancaSalario cps1 = new ContaPoupancaSalario(1000);


    }



}
