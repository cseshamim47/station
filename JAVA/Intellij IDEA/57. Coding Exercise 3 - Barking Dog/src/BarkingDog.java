public class BarkingDog {
    public static boolean shouldWakeUp(boolean barking, int hourOfDay){
        if(barking == true && ((hourOfDay<8 && hourOfDay>=0) || (hourOfDay> 22 && hourOfDay<=23))){
            return true;
        }else return false;
    }

    public static void main(String[] args) {
        System.out.println(shouldWakeUp(true,1));
        System.out.println(shouldWakeUp(true,8));
        System.out.println(shouldWakeUp(true,-1));
        System.out.println(shouldWakeUp(false,2));
        System.out.println(shouldWakeUp(true,23));
    }
}
