#include<iostream>
#include<string>
#include<iomanip>
using namespace std;
 
 
int main() {
 
	int n, k , k_good = 0;
	string str = "0123456789";
	string s;
	cin >> n >> k;
 
	for (int i = 0; i < n; i++) {
		cin >> s;
		int count = 0;
 
		for (int j = 0; j <= k; j++) {
			int r = s.find(str[j]);
			if (r != -1) {
				count++;
				r = -1;
			}
		}
        cout << count << endl;
		if (count >= k + 1) {
			k_good++;
		}
	}
 
	cout << k_good << endl;
}


// 0-6 : 7
// 10 6
// 1234560
// 1234560
// 1234560
// 1234560
// 1234560
// 1234560
// 1234560
// 1234560
// 1234560
// 1234560


// 2 1
// 1
// 10