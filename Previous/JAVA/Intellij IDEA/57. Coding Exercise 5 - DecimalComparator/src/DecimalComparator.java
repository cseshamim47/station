public class DecimalComparator {
    public static boolean areEqualByThreeDecimalPlaces(double a, double b){
//        DecimalFormat du = new DecimalFormat("#.###");
//        du.setRoundingMode(RoundingMode.FLOOR);
//        String n = du.format(a);
//        String m = du.format(b);
//
//        if(n.equals(m)) return true;
//        else return false;

        String s1 = String.valueOf(a);
        String s2 = String.valueOf(b);

        if(s1.length()==3){
            if(s1.substring(0,3).equals(s2.substring(0,3))) return true;
            else return false;
        }else{
            if(s1.substring(0,5).equals(s2.substring(0,5))) return true;
            else return false;
        }


    }

    public static void main(String[] args) {
        System.out.println(areEqualByThreeDecimalPlaces(1.0,1.0));
        System.out.println(areEqualByThreeDecimalPlaces(-3.1756, -3.175));
    }
}
