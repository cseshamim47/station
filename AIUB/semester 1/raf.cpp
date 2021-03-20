#include <iostream>
using namespace std;
int main()
{
    //Initialize an integer array of size 10. Print the number of time each element occurs in the array.
    //For example,
    //Array_1 = {8,4,6,1,6,9,6,1,9,8}
    //Output:
    //8 occurs = 2 times
    //4 occurs = 1 time
    //6 occurs = 3 times
    //1 occurs = 2 times
    //9 occurs = 2 times

    int Array_1[10]={8,4,6,1,6,9,6,1,9,8};
    int cv = 0;
    for(int i=0; i<10; i++){
        for(int j=0; j<10; j++){
            if(arr[i]==arr[j]){
                cv++;
            }
        }
    }
}
