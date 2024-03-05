// C++ program to print all 
// permutations with duplicates allowed 
#include <bits/stdc++.h> 
using namespace std; 
int tc;
/* Function to swap values at two pointers */
void swap(char *x, char *y) 
{ 
	char temp; 
	temp = *x; 
	*x = *y; 
	*y = temp; 
} 

/* Function to print permutations of string 
This function takes three parameters: 
1. String 
2. Starting index of the string 
3. Ending index of the string. */
int cnt;
void permute(char *a, int l, int r) 
{ 
	int i; 
	if (l == r) {
		cout<< "ans : ----> " << a<<endl; 
		tc++;
	}
	else
	{ 
		for (i = l; i <= r; i++) 
		{ 
									cout << "Left: " << l << " i" << i << " r" << r << endl;
									cout << "swapping : " << *(a + l) << " " << *(a + i) << endl;

 			swap((a+l), (a+i)); 
									// cout << "## permute(" << a << ", " << l+1 << ", " << r << ");" << endl;
									// cout << "Permute called!  " << ++cnt << endl;
									// getchar();
			permute(a, l+1, r); 
									// cout << "Permute Ended!  " << cnt-- << endl;
			swap((a+l), (a+i)); //backtrack 
			tc++;
		} 
	} 
} 

/* Driver program to test above functions */
int main() 
{ 

	char str[] = "abc"; 
	int n = strlen(str); 
									// cout << "#  permute(abc, 0, 2)" << endl;
									// 								cout << "Permute called!  " << ++cnt << endl;
	permute(str, 0, n-1); 
									// cout << "Permute Ended!  " << cnt-- << endl;
									// cout << "tc : " << tc <<  endl;
	return 0; 
} 



/* 
#  permute(abc, 0, 2)
{
	{Left: 0 i0 r2
	swapping : a a}---> 1st iteration done

	{Left: 0 i1 r2
	swapping : a b}---> 2nd iteration ended

	{Left: 0 i2 r2
	swapping : a c}---> 3rd iteration ended




} 



ans : ----> abc   
ans : ----> acb   
ans : ----> bac
ans : ----> bca
ans : ----> cba
ans : ----> cab


*/
