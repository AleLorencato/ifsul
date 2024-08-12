package Model;

public class Gerente extends Funcionario implements Investidor{

    private String ticker;
    private int quantidade;

    public Gerente(String nome, double salario) {
        super(nome, salario);
    }

    @Override
    public double getBonus() {
        return this.salario * 0.2;
    }

    public Gerente() {
    }
    @Override
    public String getTicker() {
        return this.ticker;
    }

    @Override
    public void setTicker(String ticker) {
        this.ticker = ticker;
    }

    @Override
    public int getQuantidade() {
        return this.quantidade;
    }

    @Override
    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return "Gerente{" +
                "ticker='" + ticker + '\'' +
                ", quantidade=" + quantidade +
                ", nome='" + nome + '\'' +
                ", salario=" + salario +
                '}';
    }



}
