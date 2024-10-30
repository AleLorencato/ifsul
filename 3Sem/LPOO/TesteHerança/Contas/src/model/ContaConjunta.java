package model;

public class ContaConjunta extends Conta{
    public ContaConjunta() {
        super();
    }

    public ContaConjunta(double saldo) {
        super(saldo);
    }

    @Override
    public String toString() {
        return "ContaConjunta{" +
                "saldo=" + saldo +
                '}';
    }

}
