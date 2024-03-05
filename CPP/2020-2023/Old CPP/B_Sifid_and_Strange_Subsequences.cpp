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
    vector<int>v;
    for(int i = 0; i < n; i++){
        int x; 
        cin >> x;
        v.push_back(x);
    }

    sort(v.begin(),v.end());

    int minn = INT_MAX;
    for(int i = 1; i < n; i++){
        int check = abs(v[i]-v[i-1]);

        minn = min(minn,check);
        if(minn >= v[i]) cnt++;
        // if(check >= v[i]) cnt++;
        else break;
    }
    cout << ++cnt << endl;
    cnt = 0;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
}


// -3 4 -2 0 -4 6 1
// -4 -3 -2 0 1 4 6

// abs|i-j| >= max
// -4 -3 = 7 min = 7 >= -3
// -3 +2 = 1 min = 1 >= -2
// -2 -0 = 2 min = 1 >= 0
// 0 - 1 = 1 min = 1 >= 1
// 1 -4 = 3 min = 1 >= 4 false  


// 4
// -3 0 2 0
// -3 0 0 2

// -3 - 0 = 3 min = 3 >= 0  cnt 1
// 0 - 0 = 0 min = 0 >= 0   cnt 2
// 0 - 2 = 2 min = 0 >= 2 false


// cout << cnt + 1 << endl;











