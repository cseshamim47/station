#include <bits/stdc++.h>
using namespace std;

int main()
{
    int y = 27640;
    int ans = 0;
    while(true){

    while(y != 0 ){
        int remainder = y % 10;
        ans += remainder;
        y /= 10;
    }
    
    if(ans % 10 != 0 && ans % 10 != ans){
        y = ans;
        ans = 0;
    }else if(ans % 10 == 0){
        y = ans;
        ans = 0;
    }else {
        break;
    }

    }

    cout << ans;
}