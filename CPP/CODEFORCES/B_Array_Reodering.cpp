//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

void solve(){
    int n;
    cin >> n;
    vector<int> odd,even;
    for(int i = 0; i < n; i++){
        int x;
        cin >> x;
        if(x % 2 == 1) odd.push_back(x);
        else even.push_back(x);
    }
    for(int i = 1; i <=even.size(); i++){
        cnt += n-i;
    }
    for(int i = 0; i < odd.size(); i++){
        for(int j = i+1; j < odd.size(); j++)
            if(__gcd(odd[i], 2*odd[j]) > 1) cnt++; 
    }
    cout << cnt << endl;
    cnt = 0;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    // cls

}