package Controller;

import Model.Desenvolvedor;
import Model.Gerente;

public class FuncionarioController {
    public static void main(String[] args) {

        Desenvolvedor d1 = new Desenvolvedor();

        Gerente g1 = new Gerente();
        Gerente g2  = new Gerente();
        d1.setNome("marcos");
        d1.setSalario(5000);

        g1.setSalario(5000);
        g1.setNome("Julio");
        g1.setSalario(5000);

        System.out.println(d1.getNome());
        System.out.println(d1.getSalario());
        System.out.println(g1.getNome());
        System.out.println(g1.getSalario() + g1.getBonus());








    }
}
