//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }

void solve(){
    ll cnt = 0;
    ll a,b;
    cin >> a >> b;
    ll tst;
    int i;
    for(i = 0; i < 10; i++){
        tst = a*pow(10,i);
        if(tst>=b){
            break; 
        }
    }
    int k = i;
    if(tst==b){
        cout << 1 << "\n";
        return;
    }else if(tst>b){
        --k;
        tst = a*pow(10,k);
    
        ll sum = 0;
        while(sum<b){
            cnt++;
            sum += tst;
            if(sum>b && k-1>=0){
                sum -= tst;
                k--;
                tst = a*pow(10,k);
                sum += tst;
            }
        }
        if(sum > b){
            cnt--;
            sum -= tst;
            ll div = (b-sum)/a;
            if((b-sum)%a == 0){
                cnt += div;
            }else cnt += b%sum; 
            sum += b%sum;
        }
        cout << cnt << "\n";
    }
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}