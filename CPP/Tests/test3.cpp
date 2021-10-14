#include <bits/stdc++.h>
using namespace std;

int main()
{
	//    Bismillah
	vector<int> v{5,4,3,2,1};
	
	vector<pair<int,int>> pr;
	pr.push_back({1,2});
	pr.push_back({4,2});
	// sort(arr,arr+5);
	vector<int>::iterator it;
	it = find(v.begin(),v.end(),2);  
	cout << it-v.begin() << endl; 
}