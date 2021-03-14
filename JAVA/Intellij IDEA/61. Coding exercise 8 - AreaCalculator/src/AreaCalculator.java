public class AreaCalculator {

    public static boolean isCarPlaying(boolean summer, int temperature){
        if(summer){
            if(temperature>=25 && temperature<=45) return true;
            else return false;
        }else if(!summer){
            if(temperature>=25 && temperature<=35) return true;
            else return false;
        }else return false;
    }


    public static void main(String[] args) {

    }




}
