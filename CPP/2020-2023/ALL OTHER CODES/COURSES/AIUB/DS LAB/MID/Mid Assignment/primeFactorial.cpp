// problem 5 : factorial prime
#include <iostream>
using namespace std;

int factorial(int x){
   if(x != 1) return x * factorial(x-1); // recurrsion
   else return 1;
}

int main()
{
   int x,count = 0;
   cin >> x;

   for(int i = 2; i < x; i++){ 
      if(x%i == 0) count++;
   }

   if(count>0 || x <= 1) cout << "Error! Not a prime number." << endl;
   else cout << factorial(x) << endl;

   // 5 = 5*4*3*2*1 = 120
   return 0;

}