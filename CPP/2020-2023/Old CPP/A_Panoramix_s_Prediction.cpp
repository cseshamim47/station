#include <bits/stdc++.h>
using namespace std;
int nextPrime(int x){
    for(int i = 2; i <= sqrt(x); i++){
        if(x % i == 0) return -1;
    }
    return x;
}
int main()
{
    int a,b;
    cin >> a >> b;
    int checker = -1;
    while(++a<=b){
        if(a%2 != 0) checker = nextPrime(a);
        if(checker == b) {
            cout << "YES\n";
            return 0;
        }else if(checker > 2) break;
    }
    cout << "NO\n";
    
    
}