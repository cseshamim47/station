public class Main {
    public static double calcFeetAndInchesToCentimeters(double feet, double inches){
        if(feet>=0 && (inches >= 0 && inches<=12)) {
            double sum = (feet*12*2.54) + (inches*2.54);
            return sum;
        }else return -1;
        // 1 inch = 2.54 centimeters and 1 foot = 12 inch
    }
    public static double calcFeetAndInchesToCentimeters(double inches){
        if(inches >= 0) {
            int feet = (int) inches/12;
            int remainingInches = (int) inches % 12;
            System.out.print(feet + " feet and "+ remainingInches + " inches = ");
            return calcFeetAndInchesToCentimeters(feet, remainingInches);
        }else return -1;
    }

    public static void main(String[] args) {
        System.out.println(calcFeetAndInchesToCentimeters(7,5));
        System.out.println(calcFeetAndInchesToCentimeters(-100) + " centimeters");
    }
}
