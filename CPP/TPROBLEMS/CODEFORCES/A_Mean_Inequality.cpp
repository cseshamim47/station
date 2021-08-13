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
    vector<int> v;
    n = n*2;
    for(int i = 0; i < n; i++){
        int x; 
        cin >> x;
        v.push_back(x);
    }
    sort(v.begin(),v.end());
    int big = n/2;
    int small = 0;

    for(int i = 0; i < n/2; i++){
        cout << v[small] << " " << v[big] << " ";
        small++;
        big++;
    }
    cout << "\n";
    
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}

// 5 3 1 
// 2 4 6

// 5 6 3 4 1 2

// 1 2 3 
// 6 5 4
// 1 6 2 5 3 4
