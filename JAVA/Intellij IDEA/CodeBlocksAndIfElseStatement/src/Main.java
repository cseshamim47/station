public class Main {

    public static void main(String[] args) {
        calculateScore(true,5,100,500);

        int score = 10000;
        int levelCompleted = 8;
        int bonus = 200;
        boolean gameOver = true;

        System.out.println(calculateScore(gameOver,levelCompleted,bonus,score));

    }

    public static int calculateScore(boolean gameOver, int levelCompleted, int bonus, int score){

        int finalScore = score+(levelCompleted * bonus);
        finalScore+=100;
        if(gameOver){
            System.out.println("Your final score was "+finalScore);
            return finalScore;
        }else return -1;

    }

}
