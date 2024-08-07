package Model;

public class DesenvolvedorSenior extends Desenvolvedor{

    public DesenvolvedorSenior(String nome, double salario){
        super(nome, salario);
    }

    @Override
    public double getBonus() {
        return getSalario() * 0.1;
    }

    @Override
    public String toString() {
        return "DesenvolvedorSenior{" +
                "nome='" + nome + '\'' +
                ", salario=" + salario +
                '}';
    }

}
