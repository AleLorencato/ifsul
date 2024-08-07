package model;

public class ContaPoupanca extends Conta{
    public ContaPoupanca() {
    }

    public ContaPoupanca(double saldo) {
        super(saldo);
    }

    public void saca(double valor){
        if (this.saldo > valor) {
            super.saca(valor);
        } else {
            System.out.println("Saldo Insuficiente!!!");
        }


    }

    @Override
    public String toString() {
        return "ContaPoupanca{" +
                "saldo=" + saldo +
                '}';
    }
}
