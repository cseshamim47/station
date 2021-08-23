//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }

void solve(){
    int n;
    cin >> n;
    int odd = 0, even = 0;
    for(int i = 0; i < n*2; i++){
        int x;
        cin >> x;
        if(x & 1) odd++;
        else even++;
    }
    if(odd == even) cout << "Yes" << endl;
    else cout << "No" << endl;
}

int main()
{
     //        Bismillah
    int t;   cin >> t;   w(t);
    // cls



}