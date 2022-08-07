//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n;
    cin >> n;
    if(n==2){
        cout << -1 << endl;
        return;
    }
    int x = n;
    n *= n;
    vector<int> v;
    for(int i = 1; i<=n; i+=2){
        v.push_back(i);
    }
    for(int i = 2; i<=n; i+=2){
        v.push_back(i);
    }
    for(int i = 0; i < n; i++){
        cnt++;
        cout << v[i] << " ";
        if(cnt == x){
            cout << endl;
            cnt = 0;
        }
    }
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}