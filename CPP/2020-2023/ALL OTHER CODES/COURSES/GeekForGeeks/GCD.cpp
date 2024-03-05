#include <iostream>
// #include <algorithm>
using namespace std;

int main()
{
    int n,k;
    cin >> n >> k;
    int answer;
    int x = min(n,k);
    for(int i = 1; i <= x; i++ ){
        if(n%i==0 and k%i==0){
            answer = i;
        }
    }    
    cout << answer;
}