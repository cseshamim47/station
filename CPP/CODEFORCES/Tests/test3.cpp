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

void solve(){}

int main()
{
	  //        Bismillah
	 // int t;   cin >> t;   w(t);
	// cls
	ll ans = 90;
	ll cnt = 2;
	ll i = 2;
	cout << "case " << cnt << " : ";
	cout << ans << endl;
	getchar();
	cnt += i;
	i++;
	while (true)
	{
		cout << "case " << cnt << " : ";
		cnt += i;
		i++;
		ans = (ans * 10) + 90;
		cout << ans << endl;
		getchar();
		
	}
	

}