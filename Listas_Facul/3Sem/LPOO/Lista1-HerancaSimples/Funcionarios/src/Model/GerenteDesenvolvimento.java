package Model;

public class GerenteDesenvolvimento extends Gerente{


    public GerenteDesenvolvimento(String nome, double salario){
        super(nome, salario);
    }

    @Override
    public double getBonus() {
        return getSalario() * 0.2;
    }

    @Override
    public String toString() {
        return "GerenteDesenvolvimento{" +
                "nome='" + nome + '\'' +
                ", salario=" + salario +
                '}';
    }

}
