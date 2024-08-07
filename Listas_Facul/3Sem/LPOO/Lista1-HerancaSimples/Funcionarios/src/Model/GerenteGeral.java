package Model;

public class GerenteGeral extends Gerente{

    public GerenteGeral(String nome, double salario){
        super(nome, salario);

    }

    @Override
    public double getBonus() {
       return getSalario() * 0.4;
    }

    @Override
    public String toString() {
        return "GerenteGeral{" +
                "nome='" + nome + '\'' +
                ", salario=" + salario +
                '}';
    }

}
