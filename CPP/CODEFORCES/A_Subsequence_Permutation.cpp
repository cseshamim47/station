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
    string str;
    cin >> str;
    string sortedStr = str;
    sort(sortedStr.begin(),sortedStr.end());
    // cout << str << endl;
    // cout << sortedStr << endl;

    for(int i = 0; i < n; i++){
        if(str[i] != sortedStr[i]) cnt++;
    }

    cout << cnt << "\n";
    cnt = 0;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}