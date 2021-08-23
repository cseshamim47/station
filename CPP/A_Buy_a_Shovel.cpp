#include <bits/stdc++.h>
using namespace std;

int main()
{
    int price, note;

    cin >> price >> note;
    int ans = 0,count = 0;
    int i = 1;
    while(true){
        int temp = price*i;
        int n = temp - note;
        if(n%10 == 0 || temp%10==0) break;
        else i++;
    }
    cout << i << endl;
    
}