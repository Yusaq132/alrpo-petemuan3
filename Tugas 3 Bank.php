public class RekeningBank {
   private String nomorRekening;
   private double saldo;

   public RekeningBank(String nomorRekening, double saldo) {
       this.nomorRekening = nomorRekening;
       this.saldo = saldo;
   }

   public String getNomorRekening() {
       return nomorRekening;
   }

   public double getSaldo() {
       return saldo;
   }

   public void deposit(double jumlah) {
       saldo += jumlah;
   }

   public boolean withdraw(double jumlah) {
       if (saldo >= jumlah) {
           saldo -= jumlah;
           return true;
       } else {
           return false;
       }
   }

   public boolean transfer(double jumlah, RekeningBank rekeningTujuan) {
       if (withdraw(jumlah)) {
           rekeningTujuan.deposit(jumlah);
           return true;
       } else {
           return false;
       }
   }
   
   public static void main(String[] args) {
       RekeningBank rekening1 = new RekeningBank("123456", 1000.00);
       RekeningBank rekening2 = new RekeningBank("789101", 500.00);

       System.out.println("Saldo rekening 1: " + rekening1.getSaldo());
       System.out.println("Saldo rekening 2: " + rekening2.getSaldo());

       rekening1.withdraw(200.00);
       rekening2.deposit(200.00); 

       System.out.println("Saldo rekening 1 setelah penarikan: " + rekening1.getSaldo());
       System.out.println("Saldo rekening 2 setelah penyetoran: " + rekening2.getSaldo());

       rekening1.transfer(500.00, rekening2);

       System.out.println("Saldo rekening 1 setelah transfer: " + rekening1.getSaldo());
       System.out.println("Saldo rekening 2 setelah transfer: " + rekening2.getSaldo());
   }
}