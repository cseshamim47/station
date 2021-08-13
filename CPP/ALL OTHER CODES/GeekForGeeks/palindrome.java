class plaindrome{

    public static void main(String[] args) {
        
        String s = "acaba";

        int start = 0;
        int end = s.length()-1;
        
        while(start<=end){
            if(s.charAt(start) != s.charAt(end)){
                System.out.println("Not palindrome");
                break;
            }
            start++;
            end--;
        }
        if(start>end) System.out.println("Palindrome");
        
    }
}